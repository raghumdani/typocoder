#include <iostream>
#include<stdlib.h>
#include<string.h>
#define MAX 100000

using namespace std;

int main()
{
   char *s=new char[MAX];
   int q;
   cin>>s;
   cin>>q; //number of queries
  // cout<<"\nValue of q "<<q<<"\n";
   int i=0;
   int n=sizeof(s);
   char *s1=new char[MAX];
   for(int i=0;i<n;i++)
    s1[i]=s[i];
    //cout<<"string "<<s<<"\nString 1 "<<s1<<"\n";
    
   
    char *testcase[100000];
	i=0; 
    for(int j=0;j<MAX;j++)
	{	testcase[j]=new char[8];
		
	}
	
	for(int j=0;j<q;j++)
	{	cin>>testcase[j];
		
	}
	
	
	
	 i=0;
	while(i<q)
	   {
       int x,a,v,b;
       //char test[8];
	   
       x=atoi(testcase[i]+0);
      // cout<<"Value of x "<<x;
       


       if(x==1)
       {
           a=atoi(testcase[i]+2);
           b=atoi(testcase[i]+4);
           v=atoi(testcase[i]+6);
           for(int i=a; i<=b; i++ )
           {
                s1[i]=(s1[i]+v)%10;
           }

       }

       if(x==2)
       {
           a=atoi(testcase[i]+2);
           b=atoi(testcase[i]+4);
           int num=0;
           for(int i=a;i<=b;i++)
           {
               int num=num*10+a; //forming the substring
           }
           if(num%3==0)
            cout<<endl<<"Yes";
           else
            cout<<endl<<"No";

       }
       i++;

   }
}
