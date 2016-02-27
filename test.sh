#!/usr/bin/bash
dpkg -i gitignore-*.deb
apt-get install -y -f
test -d test && rm -rf test
mkdir test
gitignore java >test/java
gitignore error >test/error
gitignore _AC_ 1 gitignore java >test/ACjava
gitignore _AC_ 1 gitignore jaw >test/ACjaw
chmod +rw test -R