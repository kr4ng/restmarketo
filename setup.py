import os
import sys

try:
    from setuptools import setup
except ImportError:
    from distutils.core import setup

sys.path.insert(0, os.path.join(os.path.dirname(__file__), 'restmarketo'))
from version import VERSION

long_description = '''
restmarketo is a python query client that wraps the Marketo REST API.
For sending data to Marketo, check out developers.marketo.com for more
information.
'''

setup(
    name='restmarketo',
    version=VERSION,
    url='https://github.com/kr4ng/restmarketo',
    author=['Steven Simoni', 'Ben Johnson'],
    author_email='steven.m.simoni@gmail.com',
    maintainer='steven.m.simoni@gmail.com',
    maintainer_email='steven.m.simoni@gmail.com',
    packages=['restmarketo'],
    license='MIT License',
    install_requires=[
        'requests',
        'iso8601'
    ],
    description='this is a python rest wrapper of the marketo rest api',
    long_description=long_description
)