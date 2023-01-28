INSERT INTO `utente` (`idutente`, `username`, `password`, `email`) VALUES
(1,'gio_muccioli', 'admin1', 'giovannimuccioli@gmail.com'),
(2,'gabri_menghi2', 'admin2', 'gabrielemenghi@gmail.com');

ALTER TABLE `utente`
  MODIFY `idutente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

INSERT INTO `post` (`idpost`, `titolopost`, `testopost`, `datapost`, `anteprimapost`, `numeroimmagini`, `img1`, `img2`, `img3`, `img4`, `utente`) VALUES
(1, 'Quali scarpe sono più belle?', '\"Vorrei comprare un paio di scarpe, ma sono indeciso sul colore. Come marca sono convinto delle nike e su questo non ho dubbi.\"\r\n\r\n', '2022-12-11', 'Vorrei comprare un paio di scarpe, ma sono indeciso sul colore. Come marca sono convinto delle nike e su questo non ho dubbi.', '2', 1, 2, null, null, 1),
(2, 'Che scarpe da calcio mi consigliate?', '\"Mi serve un paio di scarpe da calcio poichè nell ultimo allenamento mi si sono rotte. Sono indeciso sia sul colore che sulla marca: nike o puma...cosa mi consigliate?\"\r\n\r\n', '2022-12-11', 'Mi serve un paio di scarpe da calcio poichè nell ultimo allenamento mi si sono rotte. Sono indeciso sia sul colore che sulla marca: nike o puma...cosa mi consigliate?', '3', 3, 4, 5, null, 1),
(3, 'Che dolce posso cucinare?', '\In una giornata così piovosa come oggi ho deciso di cucinare un dolce assieme alla mia ragazza, solo che siamo indecisi su che dolce cucinare. Abbiamo diverse opzioni: la sacher, la torta della nonna, una torta gelato, oppure una cheescake. Son tutte buonissime e non sappiamo scegliere la migliore anche se siamo propensi alla cheesecake. Quale possiamo fare?"\"\r\n\r\n', '2022-12-11', 'In una giornata così piovosa come oggi ho deciso di cucinare un dolce assieme alla mia ragazza, solo che siamo indecisi su che dolce cucinare. Abbiamo diverse opzioni: la sacher, la torta della nonna, una torta gelato, oppure una cheescake.', 
'4', 6, 7, 8, 9, 1);
(5, 'Titolo: prova per modifica ed eliminazione','Testo: questa è una prova per verificare la modifica e l eliminazione', '2023-01-26', 'prova per modifica ed eliminazione', 2 , 1, 2,NULL,NULL, 1);

INSERT INTO `post` (`titolopost`, `testopost`, `datapost`, `anteprimapost`, `numeroimmagini`, `img1`, `img2`, `img3`, `img4`, `utente`) VALUES
('Il dilemma più grande', 'Tè al limone o tè alla pesca?\r\n\r\n', '2022-12-25', 'Tè al limone o tè alla pesca?\r\n\r\n', '2', 10, 11, null, null, 2);

INSERT INTO `commento` (`post`, `utente`, `datacommento`, `testo`) VALUES
(4, 2, '2022-12-25 11:36:00', 'Io sono team pesca');

INSERT INTO `profilo` (`idprofilo`, `username`, `imgprofilo`, `utente`) VALUES
(1, 'gio_muccioli', 'fotoProfilo1.jpg', 1),
(2, 'gabri_menghi2', 'fotoProfilo2.jpg', 2);

INSERT INTO `immagine` (`filename`, `votes`) VALUES
('nikeBianche.jpg',0),
('nikeNere.jpg',0),
('scarpeCalcioNere.jpg',0),
('scarpeCalcioRosse.jpg',0),
('scarpeCalcioGialle.jpg',0),
('sacherTorta.jpg',0),
('tortaDellaNonna.jpg',0),
('tortaGelato.jpg',0),
('cheesecakeTorta.jpg',0),
('telimone.jpg',0),
('tepesca.jpg',0);

INSERT INTO `segue` (`utente1`, `utente2`) VALUES
(1,2),
(2,1);

INSERT INTO `seguito` (`utente2`, `utente1`) VALUES
(2,1),
(1,2);