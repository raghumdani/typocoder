#include <iostream>
#include<bits/stdc++.h>
using namespace std;



long long  prime[10000005],j,t,n,i;
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

int main() 
{    //long long t,n;
         sieve();
        cin>>t;
        while(t--)
        {   cin>>n;
            
            if(prime[n]!=0)
                cout<<"NO"<<endl;
            else
                cout<<"YES"<<endl;
        }
	return(0);
}
     