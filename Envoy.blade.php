@servers(['prod' => 'memvents@memvents.memphistechnology.org'])

@task('deploy:prod', ['on' => 'prod'])
cd /home/memvents/memvents/
cp /home/memvents/configs/.env.production /home/memvents/memvents/.env
git pull origin master
php artisan migrate --force
@endtask

@task('memvents:update', ['on' => 'prod'])
cd /home/memvents/memvents/
php artisan memvents:update
@endtask
