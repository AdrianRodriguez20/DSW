/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package es.iespuertolacruz.rest.adrian.servicios;

import es.iespuertolacruz.rest.adrian.modelo.Partida;
import es.iespuertolacruz.rest.adrian.modelo.dao.PartidasDAO;
import java.sql.SQLException;
import java.util.Arrays;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.PathParam;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

/**
 * REST Web Service
 *
 * @author Adrián Rodríguez
 */
@Path("/partidas")
public class Partidas {
/**
 * 
 * @return status rest
 */
    @GET
    @Path("/info")
    public Response getInfo() {
        String output = "Servicio Ahorado OK ";
        return Response.status(200).entity(output).build();
    }

/**
 * 
 * @param codPartida
 * @return xml datos de la partida
 */
    @GET
    @Path("/xml/{codPartida}")
    @Produces({MediaType.APPLICATION_XML})
    public Partida getXml(@PathParam("codPartida") String codPartida) {
        return PartidasDAO.findWord(codPartida);
    }
/**
 * 
 * @param codPartida
 * @return json datos de la partida
 */
    @GET
    @Path("/json/{codPartida}")
    @Produces({MediaType.APPLICATION_JSON})
    public Partida getJson(@PathParam("codPartida") String codPartida) {
        return PartidasDAO.findWord(codPartida);
    }
/**
 * 
 * @param codPartida
 * @return status actual de la partida , del lado del jugador.
 */
    @GET
    @Path("/status/{codPartida}")
    public String palabra(@PathParam("codPartida") String codPartida) {
        return PartidasDAO.findWord(codPartida).getHuecos() + " Fallos Actuales: " + PartidasDAO.findWord(codPartida).getFallos();
    }

    /**
     * 
     * @param codPartida
     * @param palabra 
     * Crear partida
     */
    @POST
    @Path("/create/{codPartida}/{palabra}")
    public void addPartida(@PathParam("codPartida") String codPartida, @PathParam("palabra") String palabra) {
        char[] guiones = new char[palabra.length()];
        for (int i = 0; i < guiones.length; i++) {
            guiones[i] = '_';
        }
        String huecos = "";
        for (int i = 0; i < guiones.length; i++) {
            huecos += guiones[i];
        }

        PartidasDAO.insert(generarPartida(codPartida, palabra, huecos, 0));

    }
/**
 * 
 * @param codPartida
 * @param letra
 * @throws SQLException 
 * Jugar (Introducir caracteres.
 */
    @PUT
    @Path("/play/{codPartida}/{letra}")
    public void updatePartida(@PathParam("codPartida") String codPartida, @PathParam("letra") String letra) throws SQLException {
       
        String palabraSecreta = PartidasDAO.findWord(codPartida).getPalabra();
        String palabraGuiones = PartidasDAO.findWord(codPartida).getHuecos();
        int fallos = PartidasDAO.findWord(codPartida).getFallos();
        char[] guiones = palabraGuiones.toCharArray();
        char letraChar = letra.charAt(0);
        boolean acierto = false;
        for (int i = 0; i < palabraSecreta.length(); i++) {
            if (palabraSecreta.charAt(i) == letraChar) {
                guiones[i] = letraChar;
                acierto = true;
            }

        }
        String tableroActual = "";
        if (!acierto) {
            fallos++;
        }
        if (fallos == 6) {
            tableroActual = "Game Over: ";
        }

        for (int i = 0; i < guiones.length; i++) {
            tableroActual += guiones[i];
        }
        PartidasDAO.update(tableroActual, fallos, codPartida);
    }


    private Partida generarPartida(String codPartida, String palabra, String huecos, int fallos) {
        Partida partida = new Partida(codPartida, palabra, huecos, fallos);
        return partida;
    }

}
