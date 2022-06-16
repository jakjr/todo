<?php

use App\Enums\UserType;

return [

    \App\Enums\SolicitacaoAgenda\TiposEvento::class => [
        \App\Enums\SolicitacaoAgenda\TiposEvento::Inauguracao => 'Inauguração',
        \App\Enums\SolicitacaoAgenda\TiposEvento::Reuniao => 'Reunião',
    ],

    \App\Enums\SolicitacaoAgenda\Prioridade::class => [
        \App\Enums\SolicitacaoAgenda\Prioridade::Media => 'Média'
    ],

    \App\Enums\SolicitacaoAgenda\Periodo::class => [
        \App\Enums\SolicitacaoAgenda\Periodo::Manha => 'Manhã'
    ],

    \App\Enums\SolicitacaoAgenda\Status::class => [
        \App\Enums\SolicitacaoAgenda\Status::AguardandoAgendamento => 'Aguardando Agendamento'
    ],

    \App\Enums\Evento\TiposEvento::class => [
        \App\Enums\Evento\TiposEvento::Inauguracao => 'Inauguração',
        \App\Enums\Evento\TiposEvento::Reuniao => 'Reunião',
    ],

    \App\Enums\Evento\StatusPrazo::class => [
        \App\Enums\Evento\StatusPrazo::Critico => 'Crítico',
    ],

    \App\Enums\Acompanhamento\Periodo::class => [
        \App\Enums\Acompanhamento\Periodo::Amanha => 'Amanhã',
        \App\Enums\Acompanhamento\Periodo::Semana => 'Esta Semana',
        \App\Enums\Acompanhamento\Periodo::ProximaSemana => 'Próxima Semana',
        \App\Enums\Acompanhamento\Periodo::Mes => 'Esta Mês',
    ],

    \App\Enums\Tarefa\Prioridade::class => [
        \App\Enums\Tarefa\Prioridade::Media => 'Média'
    ],

    \App\Enums\Tarefa\Status::class => [
        \App\Enums\Tarefa\Status::NaoIniciado => 'Não iniciado',
        \App\Enums\Tarefa\Status::EmAndamento => 'Em andamento',
    ]
];
