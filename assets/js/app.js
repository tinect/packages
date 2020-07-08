require('bootstrap/scss/bootstrap.scss');
require('../css/app.scss');
require('bootstrap/js/src/collapse');
require('bootstrap/js/src/dropdown');
require('bootstrap/js/src/modal');
require('./search');
require('../css/loading.css');
require('./loading');

import ClipboardJS from 'clipboard';

new ClipboardJS('.btn-copy');
