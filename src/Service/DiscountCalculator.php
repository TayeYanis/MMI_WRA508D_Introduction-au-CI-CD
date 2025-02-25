<?php

namespace App\Service;

class DiscountCalculator
{
    public function calculateDiscount(float $totalAmount, bool $isVipCustomer): float
    {
        // Vérification pour éviter les montants négatifs
        if ($totalAmount < 0) {
            throw new \InvalidArgumentException('Le montant total ne peut pas être négatif.');
        }

        // Modification : La remise de 10% s'applique uniquement si le montant est STRICTEMENT supérieur à 100 €
        $discount = ($totalAmount > 100) ? $totalAmount * 0.10 : 0.0;

        // Remise supplémentaire de 5% pour les clients VIP
        if ($isVipCustomer) {
            $discount += $totalAmount * 0.05;
        }

        // La remise totale ne peut pas dépasser 20% du montant total
        $maxDiscount = $totalAmount * 0.20;

        return min($discount, $maxDiscount);
    }
}
