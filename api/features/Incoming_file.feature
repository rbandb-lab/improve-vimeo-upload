# This file contains a user story for demonstration only.
# Learn how to get started with Behat and BDD on Behat's website:
# http://behat.org/en/latest/quick_start.html

Feature:
    Frontend uploaded a file to a backend storage
    We prepare a file representation

    Scenario: It receives a file to a backend storage
        When a demo scenario sends a request to "/"
        Then the response should be received
