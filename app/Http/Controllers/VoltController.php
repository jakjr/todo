<?php

namespace App\Http\Controllers;

use App\Models\Volt;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Models\Proprietario;
use App\Http\Requests\VoltRequest;
use App\Http\Resources\VoltResource;
use Spatie\MediaLibrary\MediaCollections\FileAdder;

class VoltController extends Controller
{
    public function index(Request $request)
    {
        $keeper = app('keeper');

        $volts = Volt::query()
            ->with('proprietario', 'media')
            ->withCount('media')
            ->filter($keeper)
            ->orderBy('name') //default ordenation
            ->paginate(15)
            ->withQueryString();

        return inertia(
            'Volt/Index', [
                'volts' => VoltResource::collection($volts),
                'importantes' => Volt::query()->filter($keeper)->importante()->count(),
                'filters' => $keeper->all(),
                'lastSeen' => getLastSeen(Volt::class),
                'orderBy' => $keeper->has('orderBy') ? implode($keeper->get('orderBy')) : 'nameasc'
            ]
        );
    }

    public function orderBy($column)
    {
        $keeper = app('keeper', ['volts']);

        $oldOrderBy = $keeper->get('orderBy');

        if (@$oldOrderBy['column'] != $column) {
            $direction = in_array($column, ['updated_at', 'status']) ? 'desc' : 'asc';
        } else {
            $direction = $oldOrderBy['direction'] == 'asc' ? 'desc' : 'asc';
        }

        app('keeper', ['volts.orderBy'])->keep([
            'column' => $column,
            'direction' => $direction
        ]);
        return back();
    }

    public function create()
    {
        return inertia('Volt/Create')
            ->with('proprietarios', Proprietario::options());
    }

    public function store(VoltRequest $request)
    {
        //Criar uma action para tratar a criação do model volt e seus anexos.
        /** @var Volt $volt */
        $volt = Volt::create($request->validated());

        $volt->addAllMediaFromRequest('anexos')
            ->each(function (FileAdder $fileAdder) {
                $fileAdder
                    ->usingFileName(Uuid::uuid4())
                    ->toMediaCollection();
            });

        setLastSeen($volt);

        flash()->success("Novo Volt {$volt->name} criado!");

        return redirect()->route('volts.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Volt $volt)
    {
        setLastSeen($volt);

        return inertia('Volt/Edit')
            ->with('volt', $volt)
            ->with('medias', $volt->getMedia())
            ->with('proprietarios', Proprietario::options());;
    }

    public function update(VoltRequest $request, Volt $volt)
    {
        $volt->fill($request->validated())->save();

        $volt->addAllMediaFromRequest('anexos')
            ->each(function (FileAdder $fileAdder) {
                $fileAdder
                    ->usingFileName(Uuid::uuid4())
                    ->toMediaCollection();
            });

        flash()->success("Volt {$volt->name} alterado!");

        return redirect()->route('volts.edit', $volt);
    }

    public function destroy(Volt $volt)
    {
        $volt->delete();

        flash()->success("Volt {$volt->name} apagado.");

        return redirect()->route('volts.index');
    }

    public function ativar(Volt $volt)
    {
        flash()->success("Volt ativado.");

        $volt
            ->setAttribute('status', true)
            ->save();

        return back();
    }

    public function inativar(Volt $volt)
    {
        flash()->success("Volt inativado.");

        $volt
            ->setAttribute('status', false)
            ->save();

        return back();
    }

    public function toggleStatus(Volt $volt)
    {
        //flash()->success("Volt {$volt->name} atualizado.");

        $volt
            ->setAttribute('status', !$volt->status)
            ->save();

        return back();
    }

    public function toggleImportante(Volt $volt)
    {
        $volt
            ->setAttribute('importante', !$volt->importante)
            ->save();

        return back();
    }


}
