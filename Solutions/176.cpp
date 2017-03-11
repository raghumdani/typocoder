#include <stdio.h> 

#include <iostream>



using namespace std;
long long int x,i,a,b,c,m,t;

long long int fast_pow(long long int a,long long int n,long long int m)
	{
	    long long result = 1;
	    long long power = n;
	    long long value = a;
	    while(power>0)
	    {
	        if(power&1)
	            {result = result*value;
	            result = result%m;}
	        value = value*value;
	        value = value%m;
	        power /= 2;
	        //power >>= 1;
	    }
	    return result;
	}




int main()
{
    cin>>t;
    for(i=0;i<t;i++)
    {
        cin>>a>>b>>c>>m;
        x=fast_pow(a,fast_pow(b,c,m),m);
        cout<<x<<endl;
    }
   
    return 0;
}