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
-- 11.Sortir les produits des commandes ayant le mot "urgent" en observation.
-- Afficher numéro de commande, nom du fournisseur, libellé du produit et sous total (= quantité commandée * prix unitaire)
-- SELECT entcom.numcom AS "N° Commande", nomfou AS "Nom fournisseur", libart, SUM(qtecde*priuni) AS "Sous Total" FROM `entcom`
-- INNER JOIN `fournis` ON fournis.numfou = entcom.numfou
-- INNER JOIN `ligcom` ON entcom.numcom = ligcom.numcom
-- INNER JOIN `produit` ON ligcom.codart = produit.codart
-- WHERE obscom LIKE "%urgent%"
-- GROUP BY libart;


-- //////////////////////////////////////////////////////--
-- 12.Coder de 2 manières différentes la requête suivante : Lister le nom des fournisseurs susceptibles de livrer au moins un article.
-- SELECT nomfou AS "Nom Fournisseur" FROM `entcom`
-- INNER JOIN `fournis` ON fournis.numfou = entcom.numfou
-- GROUP BY nomfou;
------------------------- OU ----------------------------
-- SELECT nomfou AS "Nom Fournisseur" FROM `entcom`
-- INNER JOIN `ligcom` ON entcom.numcom = ligcom.numcom
-- INNER JOIN `produit` ON ligcom.codart = produit.codart
-- INNER JOIN `vente` ON produit.codart = vente.codart
-- INNER JOIN `fournis` ON vente.numfou = fournis.numfou
-- GROUP BY nomfou;

-- //////////////////////////////////////////////////////--
-- 13.Coder de 2 manières différentes la requête suivante : Lister les commandes dont le fournisseur est celui de la commande n°70210.
-- Afficher numéro de commande et date
-- SELECT entcom.numcom, datcom FROM `entcom`
-- INNER JOIN `fournis` ON entcom.numfou = fournis.numfou
-- WHERE entcom.numcom LIKE "%70210%";
------------------------- OU -----------------------------
-- SELECT entcom.numcom, datcom FROM `entcom`
-- INNER JOIN `ligcom` ON entcom.numcom = ligcom.numcom
-- INNER JOIN `produit` ON ligcom.codart = produit.codart
-- INNER JOIN `vente` ON produit.codart = vente.codart
-- INNER JOIN `fournis` ON vente.numfou = fournis.numfou
-- WHERE entcom.numcom LIKE "%70210%"
-- GROUP BY entcom.numcom;


-- //////////////////////////////////////////////////////--
-- 14.Dans les articles susceptibles d’être vendus, lister les articles moins chers (basés sur Prix1) que le moins cher des rubans (article dont le premier caractère commence par R).
-- Afficher libellé de l’article et prix1
-- SELECT libart AS "libellé de l'article", prix1 AS "Prix unitaire", vente.codart
-- FROM `produit`
-- INNER JOIN `vente` ON produit.codart = vente.codart
-- WHERE libart IN(
--     SELECT libart 
-- 	FROM vente
-- 	JOIN produit ON produit.codart = vente.codart
-- 	WHERE libart LIKE "%R%")
-- GROUP BY prix1 > 'R';

-- //////////////////////////////////////////////////////--
-- 15.Sortir la liste des fournisseurs susceptibles de livrer les produits dont le stock est inférieur ou égal à 150 % du stock d'alerte.
-- La liste sera triée par produit puis fournisseur
-- SELECT  nomfou AS "Nom fournisseur" FROM `produit`
-- INNER JOIN `vente` ON vente.codart = produit.codart
-- INNER JOIN `fournis` ON fournis.numfou = vente.numfou
-- WHERE stkphy < (stkale*1.5)
-- GROUP BY nomfou;

-- //////////////////////////////////////////////////////--
-- 16.Sortir la liste des fournisseurs susceptibles de livrer les produits dont le stock est inférieur ou égal à 150 % du stock d'alerte, et un délai de livraison d'au maximum 30 jours.
-- La liste sera triée par fournisseur puis produit
-- SELECT nomfou AS "Nom fournisseur"  FROM `fournis`
-- INNER JOIN `vente` ON fournis.numfou = vente.numfou
-- INNER JOIN `produit` ON vente.codart = produit.codart
-- WHERE stkphy < (stkale*1.5) AND delliv <= 30
-- GROUP BY nomfou;

-- //////////////////////////////////////////////////////--
-- 17.Avec le même type de sélection que ci-dessus, sortir un total des stocks par fournisseur, triés par total décroissant.
-- SELECT nomfou AS "Nom fournisseur", SUM(stkphy) AS "Total des stocks", produit.codart AS "Code Article"
-- FROM `fournis`
-- INNER JOIN `vente` ON fournis.numfou = vente.numfou
-- INNER JOIN `produit` ON vente.codart = produit.codart
-- WHERE stkphy < (stkale*1.5) AND delliv <= 30
-- GROUP BY stkphy DESC;


-- //////////////////////////////////////////////////////--
-- 18.En fin d'année, sortir la liste des produits dont la quantité réellement commandée dépasse 90% de la quantité annuelle prévue.
-- SELECT nomfou AS "Nom fournisseur", produit.codart AS "Code Article", libart AS "Nom du produit"
-- FROM `fournis`
-- INNER JOIN `vente` ON fournis.numfou = vente.numfou
-- INNER JOIN `produit` ON vente.codart = produit.codart
-- WHERE stkphy <= (qteann*0.1)
-- GROUP BY libart;


-- //////////////////////////////////////////////////////--
-- 19.Calculer le chiffre d'affaire par fournisseur pour l'année 2018, sachant que les prix indiqués sont hors taxes et que le taux de TVA est 20%.
-- SELECT nomfou AS "Nom fournisseur", 
-- CONCAT(SUM((qtecde*priuni)*0.8), ' ', "€") AS "Chiffre d'affaire 2018" 
-- FROM `ligcom`
-- INNER JOIN `entcom` ON ligcom.numcom = entcom.numcom
-- INNER JOIN `fournis` ON entcom.numfou = fournis.numfou
-- WHERE derliv LIKE "%2018%";

