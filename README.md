# Kameleon
Kameleon purpose is to connect languages into one evironment,
this is very usefull if you have many apps/scripts which you need to supervise and check their output

## How to use
Basically, You need to install a web server like Apache and PHP (minimum 7.3).

## Options

Kameleon is very customizable, for now you can run java jar files, python scripts, php scripts and shell scripts.</br>
If you have a script add and customize it's options via plugin-list.json file.

 - plugin short name (spaces forbidden)
```
"name"
```
 - plugin name displayed in main menu
```
"fullname"
```
 - plugin path
```
 "path"
```
 - file upload path (if needed)
 ```
"upload_path"
```
 - script parameters
 ```
"parameters"
 ```
  - selectable menu options (as sscript parameters)
  ```
"select"
  ```
  - programming language
  ```
"language"
  ```
  - status enable/disable plugin
  ```
"status"
  ```
  - plugin description
  ```
"description"
  ```
   - plugin image
   ```
"image"
   ```
  - restrict upload file type to (extension with ".")
  ```
"upload"
  ```
