#include <iostream>
#include<bits/stdc++.h>




long int prime[10000005],n1[10000005],j,t,n,i,c;
void sieve()
{    memset(prime,0,1000000);
     
     prime[1]=1;
     prime[0]=1;
    
      for(int i=2;i*i<=1000000;i++)
        {   for(int j=i*i;j<=1000000;j+=i)
            {
                prime[j]=1;
            }
        }
      
          
       
	for(int k=1;k<=1000000;k++)
	{	n1[k]=n1[k-1];
		if(prime[k]==0)
			n1[k]++;
	}

}
int main() 
{    //long long t,n;
         sieve();
        scanf("%ld",&t);
        while(t--)
        {   scanf("%ld",&n);
        	
            printf("%ld\n",n1[n]);
        	
        }
	return(0);
}
     
     