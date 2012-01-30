import os
import sys

path = 'C:/dev/gitstack/app'
if path not in sys.path:
    sys.path.append(path)
    sys.path.append('C:/dev/gitstack')

os.environ['DJANGO_SETTINGS_MODULE'] = 'app.settings'

import django.core.handlers.wsgi
application = django.core.handlers.wsgi.WSGIHandler()