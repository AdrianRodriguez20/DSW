package es.iespuertolacruz.rest.adrian.modelo.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.Statement;

public class Conectar {

    public static final String JDBC_SQLITE_MEMORY_DB = "jdbc:sqlite:memory.db";
    static Connection conn = null;

    /**
     * Metodo que realiza la coneccion con la BBDD
     */
    public static Connection  openConnectSQLite() {
        try {
            if (conn != null && !conn.isClosed()) {
                return conn;
            }
            conn = DriverManager.getConnection(JDBC_SQLITE_MEMORY_DB);

        } catch (Exception exception) {
            System.out.println("Se ha producido un error realizando la coneccion con la BBDD:" +exception.getMessage());
        }
        return conn;
    }

    /**
     * Metodo que finaliza la coneccion con la BBDD
     */
    public static void closeConnectSQLite() {

        try {
            if (conn != null) {
                conn.close();
            }
        } catch (Exception exception) {
            System.out.println("Se ha producido un error cerrando la conexion con la BBDD:" +exception.getMessage());

        }
        
    }

    /**
     * Metodo que me permite crear la tabla si no existe
     */
    public static void crearTabla() {

        String sql = "CREATE TABLE IF NOT EXISTS partidas " +
                "(codPartida VARCHAR (100) not NULL,"
                + "palabra VARCHAR(100) not NULL, " +
                " huecos VARCHAR(100), " +
                " fallos INTEGER, " +
                " PRIMARY KEY (codPartida ))";

        try{
            Connection conn = openConnectSQLite();
            Statement stmt = conn.createStatement();
            stmt.execute(sql);
        } catch (Exception e) {
            System.out.println(e.getMessage());
        } finally {
            closeConnectSQLite();
        }
    }
}
