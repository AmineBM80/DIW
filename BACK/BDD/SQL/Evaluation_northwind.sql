-- 1. Listes des clients français

-- SELECT CompanyName AS "Société",
-- ContactName AS "Contact",
-- ContactTitle AS "Fonction",
-- Phone AS "Téléphone",
-- Fax AS "Fax"
-- FROM `customers`
-- WHERE Country LIKE "France";

--/////////////////////////////--
--2- Liste des produits vendus par le fournisseur "Exotic Liquids" :

--SELECT ProductName AS "Produit",
-- UnitPrice AS "Prix" 
-- FROM `products`
-- INNER JOIN `suppliers` ON products.SupplierID = suppliers.SupplierID
-- WHERE suppliers.CompanyName LIKE "Exotic Liquids";

--/////////////////////////////--
--3- Nombre de produits mis à disposition par les fournisseurs français 
--(tri par nombre de produits décroissant) :

-- SELECT suppliers.CompanyName AS "Fournisseur",
-- COUNT(DISTINCT(products.ProductName)) AS "Nbre Produits"
-- FROM `products`
-- INNER JOIN `suppliers` ON suppliers.SupplierID = products.SupplierID
-- WHERE suppliers.Country LIKE "France"
-- GROUP BY suppliers.CompanyName
-- ORDER BY COUNT(DISTINCT(products.ProductName)) DESC;

--/////////////////////////////--
--4-Liste des clients français ayant passé plus de 10 commandes :
--SELECT customers.CompanyName AS "Client",
-- COUNT(orders.OrderID) AS "Nbre Commandes"
-- FROM `orders`
-- INNER JOIN `customers` ON customers.CustomerID = orders.CustomerID
-- WHERE customers.Country = "France"
-- GROUP BY customers.CompanyName
-- HAVING COUNT(orders.OrderID) > 10;

--/////////////////////////////--
--5-Liste des clients dont le montant cumulé de toutes 
--les commandes passées est supérieur à 30000 € :
-- SELECT customers.CompanyName AS "Client",
-- CONCAT(SUM((UnitPrice * Quantity)), " €") AS "CA",
-- customers.Country AS "Pays" 
-- FROM `customers`
-- INNER JOIN  `orders` ON customers.CustomerID = orders.CustomerID
-- INNER JOIN `order details` ON orders.OrderID = `order details`.OrderID
-- GROUP BY customers.CompanyName
-- HAVING SUM((UnitPrice * Quantity)) > 30000
-- ORDER BY SUM(UnitPrice * Quantity) DESC;

--/////////////////////////////--
--6-Liste des pays dans lesquels des 
--produits fournis par "Exotic Liquids" ont été livrés :
-- SELECT orders.ShipCountry AS "Pays" 
-- FROM `suppliers`
-- INNER JOIN `products` ON suppliers.SupplierID = products.SupplierID
-- INNER JOIN `order details` ON products.ProductID = `order details`.ProductID
-- INNER JOIN `orders` ON `order details`.OrderID = orders.OrderID
-- WHERE suppliers.CompanyName LIKE "Exotic Liquids";

--/////////////////////////////--
--7- Chiffre d'affaires global sur les ventes de 1997 :
-- SELECT SUM(UnitPrice * Quantity) AS "CA 1997" FROM `order details`
-- INNER JOIN `orders` ON orders.OrderID = `order details`.OrderID
-- WHERE orders.OrderDate LIKE "%1997%";

--/////////////////////////////--
--8-Chiffre d'affaires détaillé par mois, sur les ventes de 1997 :
-- SELECT MONTH(orders.OrderDate) AS "Mois 97" ,
-- SUM(UnitPrice * Quantity) AS "CA 1997" 
-- FROM `order details`
-- INNER JOIN `orders` ON orders.OrderID = `order details`.OrderID
-- WHERE orders.OrderDate LIKE "%1997%"
-- GROUP BY MONTH(orders.OrderDate);

--/////////////////////////////--
--9- A quand remonte la dernière commande du client 
--nommé "Du monde entier" ?
-- SELECT MAX(orders.OrderDate) AS "Date de dernière commande" 
-- FROM `orders`
-- INNER JOIN `customers` ON orders.CustomerID = customers.CustomerID
-- WHERE customers.CompanyName LIKE "Du monde entier";

--/////////////////////////////--
--10-Quel est le délai moyen de livraison en jours ?
--SELECT ROUND(AVG(DATEDIFF(ShippedDate, OrderDate))) AS "Délai moyen de livraison en jours"
--FROM `orders`;