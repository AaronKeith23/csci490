package com.cs330;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.Produces;
import javax.ws.rs.PathParam;
import javax.ws.rs.QueryParam;

import javax.ws.rs.Consumes;
import javax.ws.rs.POST;
import javax.ws.rs.core.MultivaluedMap;
import java.sql.PreparedStatement;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;
import javax.ws.rs.core.Response.ResponseBuilder;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import java.util.*;
import com.google.gson.Gson;

import java.sql.*;
import javax.sql.*;
import javax.naming.*;



public class IngredientDataAccess{
      
      private static IngredientDataAccess singleton;

      private DataSource dataSource;

      private IngredientDataAccess() throws NamingException, SQLException {
           
           Context initContext = new InitialContext();

           Context envContext = (Context) initContext.lookup("java:/comp/env");

           this.dataSource = (DataSource) envContext.lookup("jdbc/fooddb2");
      
      }

      public static IngredientDataAccess getInstance () throws NamingException, SQLException {
           if(singleton == null)
                singleton = new IngredientDataAccess();


           return singleton;
      }


      public Connection getConnection() throws SQLException {
           return dataSource.getConnection();
      }

}