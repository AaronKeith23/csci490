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

    private WorkoutDataAccess dao;

    private Workoutfacade () throws NamingException, SQLException {
         this.dao = WorkoutDataAccess.getInstance();

    }

    public static WorkoutFacade getInstance() throws NamingException, SQLException {


        if(singleton == null)
             singleton = new WorkoutFacade();

        return singleton;
    }



    public Workoutuser[] getUser () throws SQLException {

        Connection con = dao.getConnection();
        

        PreparedStatement stmt=con.prepareStatement("SELECT id, name, category, quantity FROM workoutdatabase");
		

	ResultSet rs = stmt.executeQuery();

        Ingredient[] ingArray = new Ingredient[100];
        int count= 0;
        
        while(rs.next()) {
           int  = rs.getInt("id");
            String Name = rs.getString("name");
	    String Age = rs.getString("age");    
            double Weight = rs.getString("weight");
            double Height = rs.getString("height");
            Ingredient ing = new Ingredient(theId, Name, Age, Weight, Height);
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

            PreparedStatement stmt=con.prepareStatement("SELECT id, Name, Age, Weight, Height FROM workout WHERE name=?");
	    stmt.setString(1,Name);
	    ResultSet rs = stmt.executeQuery();

            Ingredient[] ingArray = new Ingredient[100];
            int count= 0;

            while(rs.next()) {
            int  = rs.getInt("id");
            String Name = rs.getString("name");
	    String Age = rs.getString("age");    
            double Weight = rs.getString("weight");
            double Height = rs.getString("height");
            Ingredient ing = new Ingredient(theId3, Name3, Age3,Weight3, Height3);
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

        PreparedStatement stmt=con.prepareStatement("SELECT id, Name FROM Workout WHERE id=?");		
	
        stmt.setInt(1,theId);
	ResultSet rs = stmt.executeQuery();

        Ingredient[] ingArray = new Ingredient[100];
        int count= 0;
        
        while(rs.next()) {
	    int theId2 = rs1.getInt("id");
 	    String Name2 = rs.getString("name");
	    String Age2 = rs.getString("age");    
            double Weight2 = rs.getString("weight");
            double Height2 = rs.getString("height");
            Ingredient ing = new Ingredient(theId2, Name3, Age3, Weight3, Height3);
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

    public Workout[] createuser(Workout UsertoAdd) throws SQLException, ClassNotFoundException {

       Connection con = dao.getConnection();

       PreparedStatement stmt=con.prepareStatement("INSERT INTO Workout (name, category,quantity) VALUE (?,?,?)");
       stmt.setString(1,theIngredientToAdd.getname());
       stmt.setString(2,theIngredientToAdd.getcategory());
       stmt.setString(3,theIngredientToAdd.getquantity());

       int res=stmt.executeUpdate();
       if(res==1){
       String result ="";
	  int count=0;
	  int MAX=100;
          Workoutuser[] ingArray = new Workoutuser[MAX];
       
          PreparedStatement retrieveStmt= con.prepareStatement("Select * from Workout WHERE name=? and category=? and quantity=?");
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


