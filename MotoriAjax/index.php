<html>
    <head>
        <title>Inserimento</title>
    </head>

        <body>
            <form>
            <label for="marca">Marca</label>
            <input type="text" id="marca" name="marca" required><br>

            <label for="modello">Modello</label>
            <input type="text" id="modello" name="modello" required><br>

            <label for="anno">Anno di Produzione</label>
            <input type="number" id="anno" name="anno" min="1900" max="2025" required><br>

            <label for="prezzo">Prezzo (€)</label>
            <input type="number" id="prezzo" name="prezzo" step="0.01" required><br>

            <label for="chilometraggio">Chilometraggio (km)</label>
            <input type="number" id="chilometraggio" name="chilometraggio" required><br>

            <label for="colore">Colore</label>
            <input type="text" id="colore" name="colore" required><br>

            <label for="stato">Stato</label>
            <select id="stato" name="stato" required>
                <option value="nuova">Nuova</option>
                <option value="usata">Usata</option>
        </select>
            </form>
        </body>

</html>