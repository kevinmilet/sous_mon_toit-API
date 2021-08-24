namespace :migration do
    desc "Migrer et peupler la bdd"
    task :make_migration do
        on roles (:web) do
            within release_path do
                execute :chmod, "755", "artisan"
                execute :php, "artisan migrate:refresh"
                execute :php, "artisan db:seed"
            end
        end
    end
end
