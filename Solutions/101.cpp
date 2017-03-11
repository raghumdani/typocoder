#include <iostream>
#include<bits/stdc++.h>
using namespace std;



long long  prime[10000005],j,t,n,i,c;
void sieve()
{    memset(prime,0,10000005);
     
     prime[1]=1;
     prime[0]=1;
    
      for(int i=2;i*i<=10000005;i++)
        {   for(int j=i*i;j<=10000005;j+=i)
            {
                prime[j]=1;
            }
        }
      
          
          
}
void p(int n)
{	c=0;
	for(int k=1;k<=n;k++)
		if(prime[k]==0)
			c++;
	
}

int main() 
{    
         sieve();
        cin>>t;
        while(t--)
        {   cin>>n;
        	p(n);
            cout<<c<<endl;
        	
        }
	return(0);
}
     