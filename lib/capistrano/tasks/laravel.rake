namespace :laravel do
    desc "Accorder les permissions"
    task :fix_permissions do
        on roles (:web) do
            within release_path do
                execute :chmod, "777","-R", "storage/"
            end
        end
    end
end

namespace :migration do
    desc "migrer et peupler la bdd"
    task :make_migration do
        on roles (:web) do
            within release_path do
                execute :chmod, "755","artisan"
                execute :php, "artisan migrate:refresh"
                execute :php, "artisan db:seed"
            end
        end
    end
end

namespace :composer do
    desc "Installer les dépendances"
    task :install do
        on roles (:web) do
            within release_path do
                execute :composer, "install"
                execute :composer, "dump-autoload -o"
            end
        end
    end
end