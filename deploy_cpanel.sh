#!/bin/bash

echo "================================================="
echo "   Menyiapkan Deployment Super Admin (cPanel)    "
echo "================================================="

# Pindah ke direktori root project
cd "$(dirname "$0")"

echo "[1/4] Membersihkan cache dan konfigurasi lokal..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

echo "[2/4] Membersihkan file deployment lama (jika ada)..."
rm -f super-admin-core.zip
rm -f super-admin-public.zip

echo "[3/4] Meng-compress file Core (Backend Laravel)..."
# Mengabaikan folder public, node_modules, git, dll yang tidak perlu di core
zip -qr super-admin-core.zip . -x "public/*" "node_modules/*" ".git/*" "tests/*" "deploy_cpanel.sh" "*.zip"

echo "[4/4] Meng-compress file Public (Frontend & Asset)..."
# Masuk ke public folder dan zip isinya
cd public
zip -qr ../super-admin-public.zip .
cd ..

echo "================================================="
echo "                 SELESAI!                        "
echo "================================================="
echo "File deployment telah berhasil dibuat:"
echo " 1. super-admin-core.zip   -> Upload ke folder di LUAR public_html (misal: /home/user/super-admin-core)"
echo " 2. super-admin-public.zip -> Upload ke DALAM public_html (atau folder subdomain Anda)"
echo " "
echo "Silakan ikuti Panduan Deployment untuk setup file index.php di cPanel."
echo "================================================="
