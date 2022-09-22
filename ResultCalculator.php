<?php
include("PartyResult.php");

include("Vote.php");
include("TotalResult.php");

class ResultCalculator
{

    /**
     * @param Vote[] $votes
     *
     * @return string
     */
    public function calculateResult(array $votes): string
    {
        $totalResult = new TotalResult();
        //TODO implement calculation method.

        if($votes["Voor"] > $votes["Tegen"]){
            $totalResult ->setIsAccepted(true);
        }
        else{
            $totalResult ->setIsAccepted(false);

        }







        if ($totalResult->isAccepted()) {
            $result = "aangenomen";
        } else {
            $result = "afgewezen";
        }
        return $result;

    }

}