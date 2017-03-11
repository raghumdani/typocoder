#include<bits/stdc++.h>
using namespace std;
int main()
{   int a[27]={0};
   int i,index,x,j;
   for(i=1;i<=26;i++)
   scanf("%d",&a[i]);
   int f=1;  int c=0;
   for(i=1;i<=26;i++)
   {   if(a[i]%2)
       c++;
       if(c>1)
       {   f=0;
          break;
	   }
   }
   char ch;
   if(f==0)
   {  printf("-1\n");
   }
  /* else
   {   int g=0;
       for(i=1;i<=26;i++)
      {  if(a[i]%2)
          {  g=1;
            index=i;
             break;
		  }
	  }
	  string s,q;
	    for(i=1;i<=26;i++)
	      {  if(a[i]!=0&&a[i]%2!=1)
		     {
			   x=i+96;
			   ch=(char)x;
	         for(j=1;j<=(a[i]/2);j++)
	         s+=ch;
	        }
		  }
		  string::reverse_iterator rit;
		  for(rit=s.rbegin();rit!=s.rend();rit++)
		  {   q+=(*rit);
		  }
		 if(g) 
		 {   x=index+96;
		    ch=(char)x;
		     s+=ch;
		 }
		 s+=q;
		 cout<<s;
	  
	  
   }*/
   return 0;
   
}