#
# Table structure for table `batting`
#

CREATE TABLE batting (
  id mediumint(5) NOT NULL auto_increment,
  playerID mediumint(5) default NULL,
  gameID mediumint(5) default NULL,
  seasonID mediumint(5) default NULL,
  pa tinyint(8) default NULL,
  bb tinyint(8) default NULL,
  sol tinyint(8) default NULL,
  sos tinyint(8) default NULL,
  runs tinyint(8) default NULL,
  1b tinyint(8) default NULL,
  2b tinyint(8) default NULL,
  3b tinyint(8) default NULL,
  hr tinyint(8) default NULL,
  rbi tinyint(8) default NULL,
  sac tinyint(8) default NULL,
  hbp tinyint(8) default NULL,
  obe tinyint(8) default NULL,
  steals tinyint(8) default NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY id (id)
) TYPE=MyISAM;
# --------------------------------------------------------

#
# Table structure for table `games`
#

CREATE TABLE games (
  gameID mediumint(5) NOT NULL auto_increment,
  seasonID mediumint(5) default NULL,
  date date default NULL,
  team varchar(25) default NULL,
  PRIMARY KEY  (gameID),
  UNIQUE KEY gameID (gameID)
) TYPE=MyISAM;
# --------------------------------------------------------

#
# Table structure for table `pitching`
#

CREATE TABLE pitching (
  id mediumint(5) NOT NULL auto_increment,
  playerID mediumint(5) default NULL,
  gameID mediumint(5) default NULL,
  seasonID mediumint(5) default NULL,
  win tinyint(5) default NULL,
  loss tinyint(5) default NULL,
  save tinyint(5) default NULL,
  nd tinyint(5) default NULL,
  ip float default NULL,
  runs tinyint(5) default NULL,
  er tinyint(5) default NULL,
  bb tinyint(5) default NULL,
  sol tinyint(5) default NULL,
  sos tinyint(5) default NULL,
  batters tinyint(5) default NULL,
  hits tinyint(5) default NULL,
  hr tinyint(5) default NULL,
  gs tinyint(5) default NULL,
  hbp tinyint(5) default NULL,
  shut tinyint(5) default NULL,
  PRIMARY KEY  (id),
  UNIQUE KEY id (id)
) TYPE=MyISAM;
# --------------------------------------------------------

#
# Table structure for table `players`
#

CREATE TABLE players (
  playerID mediumint(5) NOT NULL auto_increment,
  last varchar(25) default NULL,
  first varchar(25) default NULL,
  PRIMARY KEY  (playerID),
  UNIQUE KEY playerID (playerID)
) TYPE=MyISAM;
# --------------------------------------------------------

#
# Table structure for table `playersinseason`
#

CREATE TABLE playersinseason (
  playerID mediumint(5) NOT NULL default '0',
  seasonID mediumint(5) NOT NULL default '0',
  KEY playerID (playerID),
  KEY seasonID (seasonID)
) TYPE=MyISAM;
# --------------------------------------------------------

#
# Table structure for table `season`
#

CREATE TABLE season (
  seasonID mediumint(5) NOT NULL auto_increment,
  name varchar(40) default NULL,
  PRIMARY KEY  (seasonID),
  UNIQUE KEY seasonID (seasonID)
) TYPE=MyISAM;

