<?php
namespace location\dao;
use \PDO;


// class Proprietaire
// {
// }
// $propre=new Proprietaire;
// $propre->strlen ();

//         class bien{}

//                 class typebien{}

                         class Utilisateur{
                            var $nomcomplet;
                            var $login;
                            var $pwd;
                            var $profil;
                            private $bdd;
                            private function getConnexion(){
                                try{
                                    if($this->bdd == null){
                                        $this->bdd = new PDO('mysql:host=;dbname=bdlocation;charset=utf8', 'root', '1ahmadou1',
                                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
                                    }       
                                }
                                catch(Exception $e){
                                    die('Erreur : ' . $e->getMessage());
                                }
                            }
                            function addUtilisateur()
                            {
                                $this->getConnexion();
                                // requete a executer
                               $sql = "insert into utilisateur 
                                          values(null, :nomcomplet, :login, :pwd , :profil, :etat )";
                                // preparation de la requete
                                $req = $this->bdd->prepare($sql);
                                //execution de la requete
                                $data = $req->execute(
                                    array(
                                        'nomcomplet'=>$this->nomcomplet,
                                          'login'=>$this->login,
                                          'pwd'=>$this->pwd,
                                          'profil'=>$this->profil,
                                          'etat'=>'-1'
                                ));
                                return $data;
                            }
                            public function listutilisateur(){
                                $this->getconnexion();
                                $sql = "SELECT * FROM utilisateur" ;
                                $donnees = $this->bdd->query($sql);
                                return $donnees;
                        }

                    }





?>