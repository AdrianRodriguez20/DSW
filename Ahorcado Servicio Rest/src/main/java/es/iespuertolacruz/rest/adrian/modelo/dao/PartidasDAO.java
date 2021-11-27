package es.iespuertolacruz.rest.adrian.modelo.dao;

import com.sun.org.apache.bcel.internal.generic.LSTORE;
import es.iespuertolacruz.rest.adrian.modelo.Partida;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import static es.iespuertolacruz.rest.adrian.modelo.dao.Conectar.*;

public class PartidasDAO {

    private static void initBBDD() {
        crearTabla();
    }

    /**
     * Metodo encargado de realizar la inservicio de un alumno en la BBDD.
     *
     * @param partida
     */
    public static void insert(Partida partida) {
        initBBDD();
        String sql = "INSERT INTO partidas (codPartida,palabra, huecos, fallos) VALUES(?,?,?,?)";

        try {
            Connection conn = openConnectSQLite();
            PreparedStatement pstmt = conn.prepareStatement(sql);
            pstmt.setString(1, partida.getCodPartida());
            pstmt.setString(2, partida.getPalabra());
            pstmt.setString(3, partida.getHuecos());
            pstmt.setInt(4, partida.getFallos());
            pstmt.executeUpdate();
        } catch (SQLException e) {
            System.out.println("Se ha producido un error almacenando en la BBDD:" + e.getMessage());
        } finally {
            closeConnectSQLite();
        }
    }


    /**
     * Funcion encargada de realizar la busqueda de un alumno en la BBDD a
     * traves de la clave primaria
     *
     * @param codPartida
     * @return
     */
     public static Partida findWord(String codPartida) {
        initBBDD();
        ArrayList<Partida> partidas = null;
        String sql = "Select * from partidas where codPartida= ?";

        try {
            Connection conn = openConnectSQLite();
            PreparedStatement pstmt = conn.prepareStatement(sql);
            pstmt.setString(1, codPartida);

            ResultSet resultSet = pstmt.executeQuery();
            partidas = resultSetToList(resultSet);
        } catch (SQLException e) {
            System.out.println("Se ha producido un error realizando la consulta en la BBDD:" + e.getMessage());
        } finally {
            closeConnectSQLite();
        }
        if (partidas != null) {
            return partidas.get(0);
        } else {
            return null;
        }
    }
 
    /*
     * Funcion que transforma un resultSet en una lista de partidas
     * @param resultSet
     * @return
     */


    public static String update(String huecos,int fallos, String codPartida) throws SQLException {

        initBBDD();
        String sql = "UPDATE partidas SET huecos = ?, fallos = ? WHERE codPartida= ?";
        Connection conn = openConnectSQLite();
        PreparedStatement pstmt = conn.prepareStatement(sql);
        pstmt.setString(1, huecos);
        pstmt.setInt(2, fallos );
        pstmt.setString(3, codPartida);
        pstmt.executeUpdate();
        return "bien";

    }

 

    /*
     * Funcion que transforma un resultSet en una lista de partidas
     * @param resultSet
     * @return
     */
    static ArrayList<Partida> resultSetToList(ResultSet resultSet) {
        ArrayList<Partida> partidas = new ArrayList<>();

        try {
            while (resultSet.next()) {
                partidas.add(new Partida(resultSet.getString(1), resultSet.getString(2), resultSet.getString(3), resultSet.getInt(4)));
            }
        } catch (SQLException sqlException) {
            System.out.println("Se ha producido un error transformando los datos de la consulta:" + sqlException.getMessage());

        }

        return partidas;
    }
    

}
