<?php
namespace Deployer;

require 'recipe/laravel.php';

// On set les variables de départ
set('application', 'BroomCMS');
set('ssh_multiplexing', true);
set('default_stage', 'dev');
set('repository', 'git@github.com:patwebrussell/Broom-CMS.git');
set('git_tty', false);

// Fichiers et dossiers partager
add('shared_dirs', [
    'storage',
]);
add('shared_files', [
    '.env'
]);

// Dossier 777
add('writable_dirs', [
    'bootstrap/cache',
    'storage',
    'storage/app',
    'storage/app/public',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
]);

// On laisse pas deployer prendre des stats ...
set('allow_anonymous_stats', false);

// Configuration du host por dev
host('dev')
    ->user('root')
    ->port (22)
    ->hostname('68.71.55.18')
    ->stage('dev')
    ->set('deploy_path', '/home/broomcms/public_html');

// Les tâches dans l'ordre d'execution
task('deploy', [
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:clear',
    'artisan:cache:clear',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// On met le bon owner aux fichiers
task('deploy:owner', function () {
    run('chown -R broomcms:broomcms /home/broomcms/public_html');
});

// On repart FPM pour éviter des erreurs
task('reload:php-fpm', function () {
    run('/scripts/restartsrv_apache_php_fpm');
    run('cd /home/broomcms/public_html/current && php artisan migrate');
});

// Execution des tâches supplémentaire
after('deploy:unlock', 'deploy:owner');
after('deploy', 'reload:php-fpm');
after('deploy:failed', 'deploy:unlock');
