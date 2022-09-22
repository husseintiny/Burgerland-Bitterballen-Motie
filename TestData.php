<?php

include("ResultCalculator.php");
include("VotesCalculator.php");


//Demo residents
$residents = 20000;
//Demo votes
$p1 = new Vote();
$p1->setPersonName("Sem Dijkstra");
$p1->setId(0);
$p1->setIsFor(true);
$p1->setPartyName("Partij voor de Burger");

$p2 = new Vote();
$p2->setPersonName("Daan Dijkstra");
$p2->setId(1);
$p2->setIsFor(true);
$p2->setPartyName("Partij voor de Burger");

$p3 = new Vote();
$p3->setPersonName("Luuk Dijkstra");
$p3->setId(2);
$p3->setIsFor(true);
$p3->setPartyName("Partij voor de Burger");

$p4 = new Vote();
$p4->setPersonName("Thijs Dijkstra");
$p4->setId(3);
$p4->setIsFor(true);
$p4->setPartyName("Landgenoten");

$p5 = new Vote();
$p5->setPersonName("Lieke Dijkstra");
$p5->setId(4);
$p5->setIsFor(false);
$p5->setPartyName("Burgers in Beweging");


$p6 = new Vote();
$p6->setPersonName("Burgers in Beweging");
$p6->setId(1);
$p6->setIsFor(false);
$p6->setPartyName("Groenland");


$votes = array($p1, $p2, $p3, $p4, $p5);

//Demo parties
$party1 = new PartyResult;
$party1->setPartyName("Partij voor de Burger");
$party1->setAmountFor(0);
$party1->setAmountAgainst(0);

$party2 = new PartyResult;
$party2->setPartyName("Landgenoten");
$party2->setAmountFor(0);
$party2->setAmountAgainst(0);

$party3 = new PartyResult;
$party3->setPartyName("Groenland");
$party3->setAmountFor(0);
$party3->setAmountAgainst(0);

$party4 = new PartyResult;
$party4->setPartyName("Radicaal Burgerland");
$party4->setAmountFor(0);
$party4->setAmountAgainst(0);

$party5 = new PartyResult;
$party5->setPartyName("Burgers in Beweging");;
$party5->setAmountFor(0);
$party5->setAmountAgainst(0);
$Parties = array($party1, $party2, $party3, $party4, $party5);


for ($i = 0; $i < count($votes); $i++) {
    for ($j = 0; $j < count($Parties); $j++) {

        if ($votes[$i]->getPartyName() == $Parties[$j]->getPartyName()) {
            if ($votes[$i]->isFor()) {
                $Parties[$j]->setAmountFor(($Parties[$j]->getAmountFor()) + 1);
            } else {
                $Parties[$j]->setAmountAgainst(($Parties[$j]->getAmountAgainst()) + 1);

            }
        }

    }

}

$amountFor = 0;
$amountAgainst = 0;
for ($i = 0; $i < count($Parties); $i++) {
    $amountFor += $Parties[$i]->getAmountFor();
    $amountAgainst += $Parties[$i]->getAmountAgainst();

}

$results = new ResultCalculator();
$motion = new VotesCalculator();
$motion->calculateVotes($residents);
$maxLetters = ($motion->getMaxLetters());
$result = $results->calculateResult(["Voor" => $amountFor, "Tegen" => $amountAgainst]);


echo "Er kan maximaal ${maxLetters} brieven bij de gemeente aankomen als ${residents} inwoners hebben gestemed.";
echo "\n";
echo "De stelling “Er moeten bitterballen worden geïntroduceerd op het tweewekelijkse overleg op vrijdagmiddag.\" is ${result} door de gemeente.";

