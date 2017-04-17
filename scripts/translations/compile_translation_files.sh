HERE=`dirname $0`
ROOT="$HERE/../.."
for file in `find "$ROOT/web/content/themes/rokka-wordpress-plugin-vm/languages" -name "*.po"` ; do msgfmt -o ${file/.po/.mo} $file ; done
