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




public class IngredientFacade {
    private static IngredientFacade singleton;

    private IngredientDataAccess dao;

    private IngredientFacade () throws NamingException, SQLException {
         this.dao = IngredientDataAccess.getInstance();

    }

    public static IngredientFacade getInstance() throws NamingException, SQLException {


        if(singleton == null)
             singleton = new IngredientFacade();

        return singleton;
    }



    public Ingredient[] getIngredients () throws SQLException {

        Connection con = dao.getConnection();
        

        PreparedStatement stmt=con.prepareStatement("SELECT id, name, category, quantity FROM ingredient");
		

	ResultSet rs = stmt.executeQuery();

        Ingredient[] ingArray = new Ingredient[100];
        int count= 0;
        
        while(rs.next()) {
            int theId = rs.getInt("id");
            String theName = rs.getString("name");
            String theCategory = rs.getString("category");
            String theQuantity = rs.getString("quantity");
            Ingredient ing = new Ingredient(theId, theName, theCategory, theQuantity);
            ingArray[count] = ing;
            count++;
       }

       if(count > 0) {
            ingArray = Arrays.copyOf(ingArray,count);
            return ingArray;
       }
       else
            return null;


    }

    public Ingredient[] getIngredientByName( String theName) throws SQLException, ClassNotFoundException {
            
            Connection con = dao.getConnection();

            PreparedStatement stmt=con.prepareStatement("SELECT id, name, category, quantity FROM ingredient WHERE name=?");
	    stmt.setString(1,theName);
	    ResultSet rs = stmt.executeQuery();

            Ingredient[] ingArray = new Ingredient[100];
            int count= 0;

            while(rs.next()) {
            int theId3 = rs.getInt("id");
            String theName3 = rs.getString("name");
            String theCategory3 = rs.getString("category");
            String theQuantity3 = rs.getString("quantity");
            Ingredient ing = new Ingredient(theId3, theName3, theCategory3,theQuantity3);
            ingArray[count] = ing;
            count++;
       }

       if(count > 0) {
            ingArray = Arrays.copyOf(ingArray,count);
            return ingArray;
       }
       else
            return null;

    }

    public Ingredient[] getIngredientById( int theId) throws SQLException, ClassNotFoundException {
        
        Connection con = dao.getConnection();

        PreparedStatement stmt=con.prepareStatement("SELECT id, name, category,quantity FROM ingredient WHERE id=?");		
	
        stmt.setInt(1,theId);
	ResultSet rs = stmt.executeQuery();

        Ingredient[] ingArray = new Ingredient[100];
        int count= 0;
        
        while(rs.next()) {
            int theId2 = rs.getInt("id");
            String theName2 = rs.getString("name");
            String theCategory2 = rs.getString("category");
            String theQuantity2 = rs.getString("quantity");
            Ingredient ing = new Ingredient(theId2, theName2, theCategory2, theQuantity2);
            ingArray[count] = ing;
            count++;
       }

       if(count > 0) {
            ingArray = Arrays.copyOf(ingArray,count);
            return ingArray;
       }
       else
            return null;

    }

    public Ingredient[] createIngredient(Ingredient theIngredientToAdd) throws SQLException, ClassNotFoundException {

       Connection con = dao.getConnection();

       PreparedStatement stmt=con.prepareStatement("INSERT INTO ingredient (name, category,quantity) VALUE (?,?,?)");
       stmt.setString(1,theIngredientToAdd.getname());
       stmt.setString(2,theIngredientToAdd.getcategory());
       stmt.setString(3,theIngredientToAdd.getquantity());

       int res=stmt.executeUpdate();
       if(res==1){
       String result ="";
	  int count=0;
	  int MAX=100;
          Ingredient[] ingArray = new Ingredient[MAX];
       
          PreparedStatement retrieveStmt= con.prepareStatement("Select * from ingredient WHERE name=? and category=? and quantity=?");
	  retrieveStmt.setString(1, theIngredientToAdd.getname());
	  retrieveStmt.setString(2, theIngredientToAdd.getcategory());
          retrieveStmt.setString(3, theIngredientToAdd.getquantity());
	  ResultSet rs1 = retrieveStmt.executeQuery();

          while(rs1.next()){
	     int theId3 = rs1.getInt("id");
	     String theName3 = rs1.getString("name");
             String theCategory3 = rs1.getString("category");
             String theQuantity3 = rs1.getString("quantity");
	     Ingredient ing= new Ingredient(theId3, theName3, theCategory3,theQuantity3);
	     ingArray[count]= ing;
	     count++;
	  }
              
       if(count > 0) 
          {
            ingArray = Arrays.copyOf(ingArray,count);
            return ingArray;
          }
          else
            return null;
      }
      else{
			
			Ingredient[] blankIngArray = new Ingredient[1];
			blankIngArray[0] = new Ingredient(0, "none", "none", "0");
			
			return blankIngArray;
	   }
    }

}


