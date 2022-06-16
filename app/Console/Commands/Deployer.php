<?php

namespace App\Console\Commands;

use Exception;
use File;
use Illuminate\Console\Command;

class Deployer extends Command
{

    const VERSAO = '2.0.2';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jakjr:deploy {tag?} {--i|incremental} {--m|migration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Realiza o deploy (tagging & deploy) de projetos.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this->getCredentials();

            if ($this->option('incremental')) {
                $this->newTag = $this->getIncrementalTag();
                if (!$this->confirm("Será criada a tag {$this->newTag}, ok?", true)) {
                    $this->info('Comando abortado.');
                    return;
                }
            } else {
                $this->newTag = $this->argument('tag');
            }

            if (is_null($this->newTag)) {
                $this->showLastTag();
                return;
            }

            //$this->makeUrls();
            $this->checkTag();
            $this->updateLightTagFile();
            $this->commitLightTagFile();
            $this->makePull();
            $this->makeBuild();
            $this->info('Fim. by João Alfredo');
        } catch (Exception $e) {
            $this->error($e->getMessage());
            return;
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('tag', InputArgument::OPTIONAL, 'Tag específica para o deploy.'),
        );
    }

    protected function getOptions()
    {
        return array(
            array('incremental', 'i', InputOption::VALUE_NONE, 'Realiza o deploy incrementando automaticamente a última tag + 1.'),
        );
    }

    private function getCredentials()
    {
        if ((is_null(env('DEPLOY_USER'))) || (is_null(env('DEPLOY_JENKINS_TOKEN'))) || (is_null(env('DEPLOY_JENKINS_URL')))) {
            throw new Exception('Variável de ambiente DEPLOY* não configurada em .env');
        }
        $this->user = env('DEPLOY_USER');
        $this->jenkinsUrl = env('DEPLOY_JENKINS_URL');
        $this->apiToken = env('DEPLOY_JENKINS_TOKEN');
    }

    private function checkTag()
    {
        $gitListCommand = "git tag -l \"{$this->newTag}\"";

        @exec($gitListCommand, $return, $returnVar);

        if (!empty($return)) {
            throw new Exception("Tag {$this->newTag} já existe.");
        }
    }

    private function updateLightTagFile()
    {
        $file = config_path('layout.php');

        if (!File::exists($file)) {
            throw new Exception("Arquivo não existe: $file");
        }

        $content = File::get($file);
        $newContent = preg_replace("/appVersion(.*)/", "appVersion' => '{$this->newTag}',", $content);
        if (File::put($file, $newContent) == false) {
            throw new Exception('Problemas atualizando o arquivo: ' . $file);
        }
        $this->info('config/layout.php atualizado');
    }

    private function commitLightTagFile()
    {
        $file = config_path('layout.php');

        $command = "git add $file 2>&1; git commit $file -m 'versionamento' &> /dev/null;";

        @exec($command, $return, $returnVar);
        if ($returnVar) {
            throw new Exception($return[0] . ' - ' . $command);
        }
        $this->info('config/layout.php commitado.');
    }

    private function makePull()
    {
        $command = "git tag -m 'versionamento' -a {$this->newTag}; git push --tags";

        @exec($command, $return, $returnVar);
        if ($returnVar) {
            throw new Exception($return[0]);
        }
        $this->info('Gerando e Pull nas tags.');
    }

    private function makeBuild()
    {
        if ($this->option('migration')) {
            $tipoBuild = urlencode('Migrations - Atualizacao de Banco de Dados');
        } else {
            $tipoBuild = urlencode('Normal - Somente Codigo');
        }

        $jenkinsBuildCommand = "curl -s -X POST --user '{$this->user}:{$this->apiToken}' '{$this->jenkinsUrl}buildWithParameters?TAG={$this->newTag}'";

        @exec($jenkinsBuildCommand, $return, $returnVar);
        if ($returnVar) {
            throw new Exception($return[0]);
        }
        $this->info('Build no Jenkins iniciado');
    }

    private function getLastTag()
    {
        //$command = "git describe --abbrev=0 --tags";

        $command = "git describe --tags $(git rev-list --tags --max-count=1)";

        $lastTag = shell_exec($command);

        return $lastTag;
    }

    private function showLastTag()
    {
        $this->info($this->getLastTag());
    }

    private function getIncrementalTag()
    {
        $lastTag = $this->getLastTag();
        $tagParts = explode('.', $lastTag);
        $tagParts[2] = (integer)$tagParts[2] + 1;
        return implode('.', $tagParts);
    }
}
