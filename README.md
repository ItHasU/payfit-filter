# PayFit calendar filter

This is an iCal filter developed in PHP for easy deployment on a LAMP server.

## How to test the application ?

* Download / Clone the repository.
* Run `docker-compose up`.
* Access to `http://localhost:8080/payfit.php?c=...&u=...`.

## How to access your filtered calendar ?

The filtered calendar can be accessed through `http://<host>/payfit.php?c=<company uid>&u=<user uid>`.
The "company uid" can be retrieved on the PayFit site, this the end of the URL in the import in your calendar popup.
The "user uid" is accessible in the original iCal file. All your events will have an UID starting by a unique id, so seek for your name and grab the UID.
