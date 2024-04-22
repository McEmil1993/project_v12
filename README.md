### To share file storage
```bash
php artisan config:cache
mkdir -p storage/app/public
chmod -R 775 storage

rm public/storage
ln -s ../storage/app/public public/storage


php artisan storage:link


sudo chown -R www-data:www-data storage
sudo chmod -R 775 storage

```