#include <iostream>
using namespace std;

long long m;
long long power(long long a,long long b)
{
            if(b==0) 
                return 1;
    else
    {
    
            long long x=power(a,b/2);
            if(b%2==0)
                return ((x%m)*(x%m))%m;
            else
                return (((x%m)*(x%m))%m*(a%m));
    }
}

int main() 
{
	// your code goes here
	long long a,b,c,t,q,r;
	cin>>t;
	while(t--)
	{		cin>>a>>b>>c>>m;
			q=power(b,c);
			r=power(a,b);
			cout<<r%m<<endl;
	}
	return 0;
}