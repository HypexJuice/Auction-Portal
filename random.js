function chooseTeam() {
    var teams = ['csk', 'rcb', 'kkr', 'mi'];
    var randomIndex = Math.floor(Math.random() * teams.length);
    var chosenTeam = teams[randomIndex];
    return chosenTeam;
  }