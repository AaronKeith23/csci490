
public class Workout {
	
	private int id;
	private String password;
	private String name;
	private double weight;
	private double height;
	private String category;
	private double calory;
	private String date;
	
	public Workout() {
		id = 0;
		name = null;
		category = null;
		calory = 0;
		date = null;
		password = null;
	}
	
	public Workout(int id,String password, String name,double weight, double height,String category, double calory,String date) 
	{
		this.id = id;
		this.password = password;
		this.name = name;
		this.category = category;
		this.calory = calory;
		this.date = date;
		this.weight = weight;
		this.height = height;
	}
	
	public int getid()
	{
		return id;
	}
	
	public String getname()
	{
		return name;
	}
	
	public double getweight() 
	{
		return weight;
	}
	public double getheight()
	{
		return height;
	}
	
	public String getpassword()
	{
		return password;
	}
	public String getcategory()
	{
		return category;
	}
	public double getcalory()
	{
		return calory;
	}
	public String getdate()
	{
		return date;
	}


}
