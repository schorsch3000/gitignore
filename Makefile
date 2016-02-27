.PHONY: container clean build interactive_test githubrelease tag

build: container
	docker run -ti -v "${PWD}:/WORK" gitignore ./debianize

container:
	docker build -t gitignore .

interactive_test: build
	docker run -ti -v "${PWD}:/WORK" gitignore /bin/bash

test: build
	docker run -ti -v "${PWD}:/WORK" gitignore /bin/bash /WORK/test.sh
	@grep -q ERROR test/error || (echo FAIL: searching for an non existent value doesn\'t create an error && exit 2)
	@grep -q "'java'" test/ACjava || (echo FAIL: Autocompleting  java doesn\'t show java && exit 2)
	@grep -q "'java'" test/ACjaw || (echo FAIL: Autocompleting  jaw doesn\'t show java && exit 2)
	@grep -q '*.class' test/java || (echo FAIL: gitignore for java doesn\'t have *.class in it && exit 2)
	@echo Tests run fine.

clean:
	docker rmi -f gitignore

githubrelease: clean test
	#todo
tag:
	git status
	git tag $(cat .semver)
