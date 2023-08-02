all:
	yarn
	mkdir -p resources/heroicons
	cp -r node_modules/heroicons/20/solid resources/20/solid
	cp -r node_modules/heroicons/24/solid resources/24/solid
	cp -r node_modules/heroicons/24/outline resources/24/outline
	cp node_modules/heroicons/LICENSE resources/heroicons/
