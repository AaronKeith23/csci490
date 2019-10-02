package com.cs330;
import com.google.gson.Gson;

public class JSONIngredientTest{
	public static void main(String[] args){
		Ingredient i =  new Ingredient(12, "orange", "fruit");
		System.out.println("Java object: "+i.toString());
		Gson theGsonObj = new Gson();
		String jsonIngredient = theGsonObj.toJson(i);
		System.out.println("JSON formatted: "+jsonIngredient);
		Ingredient i2 = theGsonObj.fromJson(jsonIngredient, Ingredient.class);
		System.out.println("Back to Java object: "+ i2.toString());
	}
}