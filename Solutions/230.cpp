 #include <stdio.h> 

int main() { 
    int t;
    scanf("%d",&t);
    int i;int c=0,j;int n=0;int a[t];int k=0;int count=0;int temp=0;int ml=0;int b[t];int ans[t];
    for(i=0;i<t;i++)
    {
        scanf("%d",&a[i]);
    }
    for(i=0;i<t;i++)
    b[i]=i;
   
    for(i=0;i<t-1;i++)
    {
        for(j=0;j<t-i-1;j++)
        {
            if(a[j]>a[j+1])
            {
            	
                temp=a[j];
                a[j]=a[j+1];
                a[j+1]=temp;
                temp=b[j];
                b[j]=b[j+1];
                b[j+1]=temp;
            }
        }
    }
    for(k=0;k<t;k++)
    {
        if(a[k]==1)
        {
            ans[k]=0;
            continue;
        }
        if(k==0)
        ml=2;
        else
        ml=a[k-1]+1;
        
    for(i=ml;i<=a[k];i++)
    {
        c=0;
        
        
        for(j=2;j<=i/2;j++)
        {
            if(c>0)break;
            if(i%j==0)c++;
        }
        if(c==0)count++;
       
    }
        ans[k]=count;
    }
    
    for(i=0;i<t;i++)
    {
    	for(j=0;j<t;j++)
    	{
    		if(b[j]==i)
    		{
    		
			
    		printf("%d\n",ans[j]);
    		break;
    		}
    		
    	
		}
	}
	return(0);
}