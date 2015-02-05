@apero
Feature: Create aperos

  Scenario: Create an apero
    Given i am on "login"
    When I fill in the following:
      | username | Al |
      | password | Al |
    When I submit press "Submit"
    Then I should be redirected to "/"
    Then I go to "create"
    When I fill "title" with "titre"
    When I fill "content" with "blablabla"
    When I fill "date" with "28-02-2015"
    When I fill "tag_id" with "5"
    When I submit press "Ajouter"
    Then I should be redirected on "/"
    Then I should message "success"