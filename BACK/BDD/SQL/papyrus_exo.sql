-- Exercice

-- Vous devez préparer le développement de l’application, et coder les requêtes correspondant aux besoins d'affichage définis ci-dessous en langage SQL.


-- //////////////////////////////////////////////////////--
-- 1. Quelles sont les commandes du fournisseur n°9120 ?

-- SELECT produit.codart, libart FROM `produit` INNER JOIN `ligcom` ON produit.codart = ligcom.codart INNER JOIN `entcom` ON ligcom.numcom = entcom.numcom INNER JOIN `fournis` ON entcom.numfou = fournis.numfou WHERE fournis.numfou = 9120;

-- //////////////////////////////////////////////////////--
-- 2. Afficher le code des fournisseurs pour lesquels des commandes ont été passées.

-- SELECT DISTINCT vente.numfou FROM `vente` INNER JOIN `fournis` ON fournis.numfou = vente.numfou WHERE fournis.numfou = vente.numfou;

-- //////////////////////////////////////////////////////--
-- 3. Afficher le nombre de commandes fournisseurs passées, et le nombre de fournisseur concernés.

--SELECT COUNT(vente.codart) AS "nbr commande", COUNT(DISTINCT vente.numfou) AS "nombre de fournisseur" FROM `vente`
-- INNER JOIN `fournis` ON fournis.numfou = vente.numfou
-- WHERE fournis.numfou = vente.numfou;

-- //////////////////////////////////////////////////////--
-- 4.Extraire les produits ayant un stock inférieur ou égal au stock d'alerte, et dont la quantité annuelle est inférieure à 1000.

-- Informations à fournir : n° produit, libellé produit, stock actuel, stock d'alerte, quantité annuelle)

--SELECT codart AS "n°produit", libart AS "Nom Produit", stkphy AS "Stock actuel", stkale AS "Stock d'alerte", qteann AS "quantité annuelle" FROM `produit` WHERE produit.stkale >= produit.stkphy AND produit.qteann < 1000; 

-- //////////////////////////////////////////////////////--
-- 5.Quels sont les fournisseurs situés dans les départements 75, 78, 92, 77 ?
--L’affichage (département, nom fournisseur) sera effectué par département décroissant, puis par ordre alphabétique.

--SELECT LEFT(posfou,2) AS "Département", nomfou AS "Nom fournisseur" FROM `fournis`
-- WHERE fournis.posfou LIKE '75%' OR
-- fournis.posfou LIKE '78%' OR 
-- fournis.posfou LIKE '92%' OR 
-- fournis.posfou LIKE '77%'
-- ORDER BY posfou DESC, nomfou ASC;

-- //////////////////////////////////////////////////////--
-- 6.Quelles sont les commandes passées en mars et en avril ?
-- SELECT numcom AS "Commande Mars-Avril" FROM `ligcom` WHERE MONTH(derliv) = 3 OR MONTH(derliv) = 4;

-- //////////////////////////////////////////////////////--
-- 7.Quelles sont les commandes du jour qui ont des observations particulières ?
-- Afficher numéro de commande et date de commande

--SELECT numcom AS "N°Commande", datcom AS "Date de Commande" FROM `entcom` WHERE obscom != ""; 

-- //////////////////////////////////////////////////////--
--8.Lister le total de chaque commande par total décroissant.
--Afficher numéro de commande et total

--SELECT numcom AS "N° Commande", SUM(qtecde*priuni) AS "Total de Commande" FROM `ligcom`
-- GROUP BY numcom
-- ORDER BY (qtecde*priuni) DESC;

-- //////////////////////////////////////////////////////--
--9.Lister les commandes dont le total est supérieur à 10000€ ; on exclura dans le calcul du total les articles commandés en quantité supérieure ou égale à 1000. 
--Afficher numéro de commande et total

-- SELECT numcom AS "N° Commande", SUM(qtecde*priuni) AS "Total de Commande" FROM `ligcom` WHERE qtecde <= 1000 AND (qtecde*priuni) > 10000 GROUP BY numcom;

-- //////////////////////////////////////////////////////--
--10.Lister les commandes par nom de fournisseur.
--Afficher nom du fournisseur, numéro de commande et date

-- SELECT ligcom.numcom AS "N° Commande", fournis.nomfou AS "Nom fournisseur" FROM `ligcom` INNER JOIN `entcom` ON ligcom.numcom = entcom.numcom INNER JOIN `fournis` ON entcom.numfou = fournis.numfou GROUP BY ligcom.numcom;

-- //////////////////////////////////////////////////////--


