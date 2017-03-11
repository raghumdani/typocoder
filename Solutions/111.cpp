#include <iostream>
#include<bits/stdc++.h>
using namespace std;



long long  prime[10000005],n1[10000005],j,t,n,i,c;
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
      
          
       
	for(int k=1;k<=10000005;k++)
	{	n1[k]=n1[k-1];
		if(prime[k]==0)
			n1[k]++;
	}

}
int main() 
{    
         sieve();
        cin>>t;
        while(t--)
        {   cin>>n;
        	
            cout<<n1[n]<<endl;
        	
        }
	return(0);
}