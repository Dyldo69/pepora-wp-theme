#!/bin/bash
# Pepora Health — Deploy theme to Hostinger
# Usage: just run "bash deploy.sh" from this folder

REMOTE="u763136400@217.196.55.226"
PORT="65002"
KEY="$HOME/.ssh/id_ed25519"
REMOTE_PATH="/home/u763136400/domains/pepora.health/public_html/wp-content/themes/pepora-wp-theme-1/"

echo "🚀 Deploying Pepora theme..."

# Upload all PHP, CSS, JS files
scp -P $PORT -i $KEY \
  archive.php footer.php front-page.php functions.php header.php \
  home.php index.php page-shop.php page-science.php page-contact.php \
  pepora.css pepora.js single.php style.css \
  $REMOTE:$REMOTE_PATH

# Upload woocommerce templates
scp -P $PORT -i $KEY \
  woocommerce/archive-product.php \
  woocommerce/content-product.php \
  woocommerce/single-product.php \
  $REMOTE:${REMOTE_PATH}woocommerce/

echo "✅ Deploy complete! Don't forget to purge LiteSpeed cache."
