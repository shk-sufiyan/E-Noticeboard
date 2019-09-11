var app = angular.module('chatApp', ['firebase']);

app.controller('ChatController', function($scope, $firebaseArray) {
    var ref = firebase.database().ref().child('messages');
    var ref = firebase.database().ref().child('title');
    var ref = firebase.database().ref().child('division');
    var ref = firebase.database().ref().child('sendby');
    $scope.messages = $firebaseArray(ref);
    $scope.title = $firebaseArray(ref);
    $scope.division = $firebaseArray(ref);
    $scope.sendby = $firebaseArray(ref);

    $scope.send = function() {
        $scope.messages.$add({
            title:$scope.titles,
            division:$scope.division,
            sendby:$scope.sendby,
            message: $scope.messageText,
            date: Date.now()
        })

    }
    $scope.delData = function() {
      if (confirm('Are you sure you want to delete entire Notice you send??')) {
      var ref = firebase.database().ref().child('test');
      ref.remove();
    }
    }

})
