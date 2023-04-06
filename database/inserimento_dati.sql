/*L'utente va creato direttamente dal sito, in modo che la password venga opportunamente codificata*/
/*INSERT INTO `utente` (`idutente`, `username`, `password`, `email`) VALUES
(1,'gio_muccioli', 'admin1', 'giovannimuccioli@gmail.com'),
(2,'gabri_menghi', 'admin2', 'gabrielemenghi@gmail.com'),
(3,'prova', '123', 'prova@gmail.com');*/

INSERT INTO `post` (`idpost`, `titolopost`, `testopost`, `datapost`, `numeroimmagini`, `img1`, `img2`, `img3`, `img4`, `utente`) VALUES
(1, 'Quali scarpe sono più belle?', '\Vorrei comprare un paio di scarpe, ma sono indeciso sul colore. Come marca sono convinto delle nike e su questo non ho dubbi.\r\n\r\n', '2022-12-11', '2', 1, 2, null, null, 1),
(2, 'Che scarpe da calcio mi consigliate?', '\Mi serve un paio di scarpe da calcio poichè nell ultimo allenamento mi si sono rotte. Sono indeciso sia sul colore che sulla marca: nike o puma...cosa mi consigliate?\r\n\r\n', '2022-12-11', '3', 3, 4, 5, null, 1),
(3, 'Che dolce posso cucinare?', '\In una giornata così piovosa come oggi ho deciso di cucinare un dolce assieme alla mia ragazza, solo che siamo indecisi su che dolce cucinare. Abbiamo diverse opzioni: la sacher, la torta della nonna, una torta gelato, oppure una cheescake. Son tutte buonissime e non sappiamo scegliere la migliore anche se siamo propensi alla cheesecake. Quale possiamo fare?"\"\r\n\r\n', '2022-12-11', '4', 6, 7, 8, 9, 1),

INSERT INTO `post` (`titolopost`, `testopost`, `datapost`, `numeroimmagini`, `img1`, `img2`, `img3`, `img4`, `utente`) VALUES
('Tè al limone o tè alla pesca?', 'Una delle domande più discusse: tè al limone o tè alla pesca? Di che team fate parte?', '2022-12-25', '2', 10, 11, null, null, 2);

INSERT INTO `commento` (`post`, `utente`, `datacommento`, `testo`) VALUES
(4, 2, '2022-12-25 11:36:00', 'Io sono team pesca');

INSERT INTO `profilo` (`idprofilo`, `imgprofilo`, `datipersonali`, `utente`) VALUES
(1, 'fotoProfilo1.jpg', 'Qui si troveranno tutti i dati personali che un utente desidera inserire', 1),
(2, 'fotoProfilo2.jpg', 'Qui si troveranno tutti i dati personali che un utente desidera inserire', 2),
(3, 'fotoProfilo3.jpg', 'Qui i dati personali da inserire/modificare', 3);

INSERT INTO `immagine` (`image_id`, `filename`, `descrizione`, `votes`) VALUES
(1, 'nikeBianche.jpg', 'Nike bianche', 5),
(2, 'nikeNere.jpg', 'Nike nere', 4),
(3, 'scarpeCalcioNere.jpg', 'Scarpe calcio nere', 1),
(4, 'scarpeCalcioRosse.jpg', 'Scarpe calcio rosse', 1),
(5, 'scarpeCalcioGialle.jpg', 'Scarpe calcio gialle', 1),
(6, 'sacherTorta.jpg', 'Torta sacher', 2),
(7, 'tortaDellaNonna.jpg', 'Torta della nonna', 1),
(8, 'tortaGelato.jpg', 'Torta gelato', 2),
(9, 'cheesecakeTorta.jpg', 'Cheesecake', 7),
(10, 'telimone.jpg', 'Te al limone', 4),
(11, 'tepesca.jpg', 'Te alla pesca', 0);
