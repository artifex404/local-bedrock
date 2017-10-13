# Change Log
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) 
and this project adheres to [Semantic Versioning](http://semver.org/).

## [1.1.0] - 2017-07-17

### Added

* New constant `Env::USE_ENV_ARRAY` to get the values using `$_ENV` array instead `getenv()` [#3](https://github.com/oscarotero/env/issues/3).

### Fixed

* Fixed test in php versions 5.2 and 7.x

## [1.0.2] - 2016-05-08

### Fixed

* `Env::init()` checks if the function `env()` exists, to prevent fatal errors on declare the function twice. If the funcion couldn't be included, returns false, otherwise returns true [#1](https://github.com/oscarotero/env/pull/1).

## [1.0.1] - 2015-12-31

### Fixed

* Fixed error on strip quotes to empty strings

## 1.0.0 - 2015-12-30

First stable version

---

Previous releases are documented in [github releases](https://github.com/oscarotero/Gettext/releases)

[1.1.0]: https://github.com/oscarotero/env/compare/v1.0.2...v1.1.0
[1.0.2]: https://github.com/oscarotero/env/compare/v1.0.1...v1.0.2
[1.0.1]: https://github.com/oscarotero/env/compare/v1.0.0...v1.0.1
