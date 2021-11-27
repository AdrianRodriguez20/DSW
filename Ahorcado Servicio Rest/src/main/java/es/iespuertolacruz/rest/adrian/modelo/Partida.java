/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package es.iespuertolacruz.rest.adrian.modelo;

import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author Adrián Rodríguez
 */
@XmlRootElement
public class Partida {

    private String codPartida;
    private String palabra;
    private String huecos;
    private Integer fallos;

    public Partida() {
    }

    public Partida(String codPartida, String palabra, String huecos, Integer fallos) {
        this.codPartida = codPartida;
        this.palabra = palabra;
        this.huecos = huecos;
        this.fallos = fallos;
    }

    public String getCodPartida() {
        return codPartida;
    }

    public void setCodPartida(String codPartida) {
        this.codPartida = codPartida;
    }

    public String getPalabra() {
        return palabra;
    }

    public void setPalabra(String palabra) {
        this.palabra = palabra;
    }

    public String getHuecos() {
        return huecos;
    }

    public void setHuecos(String huecos) {
        this.huecos = huecos;
    }

    public Integer getFallos() {
        return fallos;
    }

    public void setFallos(Integer fallos) {
        this.fallos = fallos;
    }

    @Override
    public String toString() {
        return "Palabra:" + this.palabra + " " + "huecos:" + this.huecos + " " + " fallos:" + this.fallos;
    }

}
