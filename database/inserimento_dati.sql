INSERT INTO `utente` (`idutente`, `username`, `password`, `nome`, `email`) VALUES
(1,'gio_muccioli', 'admin1', 'Giovanni Muccioli', 'giovannimuccioli@gmail.com'),
(2,'gabri_menghi2', 'admin2', 'Gabriele Menghi', 'gabrielemenghi@gmail.com');

ALTER TABLE `utente`
  MODIFY `idutente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

INSERT INTO `post` (`idpost`, `titolopost`, `testopost`, `datapost`, `anteprimapost`, `numeroimmagini`, `img1`, `img2`, `img3`, `img4`, `utente`) VALUES
(1, 'Quali scarpe sono più belle?', '\"Vorrei comprare un paio di scarpe, ma sono indeciso sul colore. Come marca sono convinto delle nike e su questo non ho dubbi.\"\r\n\r\n', '2022-12-11', 'Vorrei comprare un paio di scarpe, ma sono indeciso sul colore. Come marca sono convinto delle nike e su questo non ho dubbi.', '2', 'nikeBianche.jpg', 'nikeNere.jpg', '', '', 1),
(2, 'Che scarpe da calcio mi consigliate?', '\"Mi serve un paio di scarpe da calcio poichè nell ultimo allenamento mi si sono rotte. Sono indeciso sia sul colore che sulla marca: nike o puma...cosa mi consigliate?\"\r\n\r\n', '2022-12-11', 'Mi serve un paio di scarpe da calcio poichè nell ultimo allenamento mi si sono rotte. Sono indeciso sia sul colore che sulla marca: nike o puma...cosa mi consigliate?', '3', 'scarpeCalcioNere.jpg', 'scarpeCalcioRosse.jpg', 'scarpeCalcioGialle.jpg', '', 2),
(3, 'Che dolce posso cucinare?', '\In una giornata così piovosa come oggi ho deciso di cucinare un dolce assieme alla mia ragazza, solo che siamo indecisi su che dolce cucinare. Abbiamo diverse opzioni: la sacher, la torta della nonna, una torta gelato, oppure una cheescake. Son tutte buonissime e non sappiamo scegliere la migliore anche se siamo propensi alla cheesecake. Quale possiamo fare?"\"\r\n\r\n', '2022-12-11', 'In una giornata così piovosa come oggi ho deciso di cucinare un dolce assieme alla mia ragazza, solo che siamo indecisi su che dolce cucinare. Abbiamo diverse opzioni: la sacher, la torta della nonna, una torta gelato, oppure una cheescake.', '4', 'sacherTorta.jpg', 'tortaDellaNonna.jpg', 'tortaGelato.jpg', 'cheesecakeTorta.jpg', 1);

INSERT INTO `post` (`titolopost`, `testopost`, `datapost`, `anteprimapost`, `numeroimmagini`, `img1`, `img2`, `img3`, `img4`, `utente`) VALUES
('Il dilemma più grande', 'Tè al limone o tè alla pesca?\r\n\r\n', '2022-12-25', 'Tè al limone o tè alla pesca?\r\n\r\n', '2', 'telimone.jpg', 'tepesca.jpg', '', '', 2);

INSERT INTO `commento` (`post`, `utente`, `datacommento`, `testo`) VALUES
(4, 2, '2022-12-25 11:36:00', 'Io sono team pesca');

 INTO `profilo` (`idprofilo`, `username`, `imgprofilo`, `utente`) VALUES
(1, 'gio_muccioli', 'fotoProfilo1.jpg', 1),
(2, 'gabri_menghi2', 'fotoProfilo2.jpg', 2);