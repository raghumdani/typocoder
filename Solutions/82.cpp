#include <stdio.h> 

int main() { 
    int t,flag;
    long int x;
    cin>>t;
    for(int i=1;i<=t;i++)
    {
         flag=1;
         cin>>x;
         for(int j=2;j<=x/2;j++)
         {
              if(x%j==0)
              {
                  flag=0;
                  cout<<"NO"<<endl;
              }
              if(flag!=0)
              cout<<"YES"<<endl;
         }
    }
	return(0);
}